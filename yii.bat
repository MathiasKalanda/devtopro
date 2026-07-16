@echo off

rem -------------------------------------------------------------
rem  Yii command line bootstrap script for Windows.
rem
rem  @author Qiang Xue <qiang.xue@gmail.com>
rem  @link https://www.yiiframework.com/
rem  @copyright Copyright (c) 2008 Yii Software LLC
rem  @license https://www.yiiframework.com/license/
rem -------------------------------------------------------------

@setlocal

set YII_PATH=%~dp0

if "%PHP_COMMAND%" == "" set PHP_COMMAND=php.exe

"%PHP_COMMAND%" "%YII_PATH%yii" %*

@endlocal



@REM I recommend we do it in this order:
@REM ✅ Create the users table in PostgreSQL.
@REM ✅ Convert User.php from a hard-coded array to an ActiveRecord model.
@REM ✅ Build a registration page.
@REM ✅ Update the login to authenticate against the database.
@REM ✅ Connect articles and bookmarks to the authenticated user.

@REM This will give you a proper production-ready authentication system instead of relying on the Yii demo accounts. I think this is the best foundation for the rest of your project.
