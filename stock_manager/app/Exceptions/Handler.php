

public function render($request, Throwable $e)
{
    if ($this->isHttpException($e)) {
        return parent::render($request, $e);
    }

    return response()->view('errors.500', [], 500);
}
