<?php

namespace App\Exceptions;

use App\SupportTwig\Loader\NanoLoader;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Contracts\Filesystem\FileNotFoundException;
use Symfony\Component\ErrorHandler\Error\FatalError;
use Twig\Error\Error as BoardError;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Error\SyntaxError;
use Throwable;
use Error;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        FileNotFoundException::class,
        FatalError::class,
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Report or log an exception.
     *
     * @param  \Throwable  $exception
     * @return void
     *
     * @throws \Exception
     */
    public function report(Throwable $exception)
    {
        if(config('app.env') === 'production' && $exception instanceof BoardError){
            return null;
        }
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Throwable  $exception
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @throws \Throwable
     */
    public function render($request, Throwable $exception)
    {
        $msg = $exception->getMessage();
        $line = $exception->getLine();
        
        if(config('app.env') !== 'production'){
            if($exception instanceOf FileNotFoundException){
                abort(404, $exception->getMessage());
            } else if(($exception instanceOf SyntaxError || $exception instanceOf RuntimeError) && $loader = new NanoLoader && $template = $exception->getSourceContext()->getName()){
                $code = $loader->getSourceContext($template)->getCode();
                bb('error', bb_config('twig.debug_mode', false) ? [$code, $msg, $line]: null) && abort(503);
            } else if($exception instanceOf LoaderError){
                $doc = bb_config('filesystem.offloadDoc');
                return $doc ? response(gtrim(bb_env()->render($doc)), 404): abort(404, $msg);
            } else if($exception instanceof Error){
                abort(500);
            }
        }
        return parent::render($request, $exception);
    }
}