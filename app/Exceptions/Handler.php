<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Contracts\Filesystem\FileNotFoundException;
use Symfony\Component\ErrorHandler\Error\FatalError;
use Twig\Error\{Error, LoaderError, RuntimeError, SyntaxError};
use \Error as BoardError;
use Throwable;

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
        if(config('app.env') === 'production' && $exception instanceof Error){
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
    public function rende($request, Throwable $exception)
    {
        $msg = $exception->getMessage();
        $line = $exception->getLine();
        
        if(config('app.env') === 'production'){
            if($exception instanceOf FileNotFoundException){
                abort(404, $exception->getMessage());
            } else if(($exception instanceOf SyntaxError || $exception instanceOf RuntimeError) && $loader = new \App\Support\TwigLoader && $template = $exception->getSourceContext()->getName()){
                $code = $loader->getSourceContext($template)->getCode();
                bb('error', bb_config('twig.debug_mode', false) ? [$code, $msg, $line]: null) && abort(503);
            } else if($exception instanceOf LoaderError){
                $doc = bb_config('filesystem.offloadDoc');
                return $doc ? response(gtrim(bb_env()->render($doc)), 404): abort(404, $msg);
            } else if($exception instanceof BoardError){
                abort(500);
            }
        }
        return parent::render($request, $exception);
    }
}