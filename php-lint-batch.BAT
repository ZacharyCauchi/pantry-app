for /R %%a in (*.php*) do (
	php -l %%a
)

pause