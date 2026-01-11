public function register()
{
$this->renderable(function (\Illuminate\Database\ConnectionException $e, $request) {
return response()->view('errors.500', [], 500);
});

$this->renderable(function (\PDOException $e, $request) {
return response()->view('errors.500', [], 500);
});

$this->renderable(function (\Illuminate\Database\QueryException $e, $request) {
return response()->view('errors.500', [], 500);
});

$this->renderable(function (\Symfony\Component\HttpKernel\Exception\HttpException $e, $request) {
return response()->view('errors.500', [], 500);
});
}


public function render($request, Throwable $e)
{
if ($this->isHttpException($e)) {
return parent::render($request, $e);
}

return response()->view('errors.500', [], 500);
}