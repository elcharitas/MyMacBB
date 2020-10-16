<?php

namespace App\Exceptions;

use Throwable;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Contracts\Filesystem\FileNotFoundException;
use Symfony\Component\ErrorHandler\Error\FatalError;
use Twig\Error\Error as BoardError;
use Twig\Error\RuntimeError;
use Twig\Error\SyntaxError;

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
        $debug = bb_config('twig.debug_mode', false);
        
        if(config('app.env') !== 'production' && ($exception instanceof SyntaxError || $exception instanceOf RuntimeError)){
            $code = $exception->getSourceContext()->getCode();
            bb('error', $debug ? [$code, $msg, $line]: null) && abort(503);
        }
        
        return parent::render($request, $exception);
    }
}