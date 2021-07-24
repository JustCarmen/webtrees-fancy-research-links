:: Compile Mo-files before distribution
cd C:\Program Files (x86)\Poedit\GettextTools\bin
SET SOUR=%~dp0
FOR %%f in (%SOUR%resources\lang\*.po) DO (
	msgfmt  %%f --output-file %%~dpf%%~nf.mo
)
