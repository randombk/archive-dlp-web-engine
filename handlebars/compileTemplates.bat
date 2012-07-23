@echo off
for /R "." %%f in (*.tmpl) do (
    handlebars %%~ff -f %%~df%%~pf%%~nf.js
)
exit