<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Thefacebook | Welcome to Thefacebook!</title>
    <link rel="stylesheet" href="{{ asset('css/welcome.css') }}">
</head>
<body>
    <center>
        <table class="bordertable" cellspacing="0" cellpadding="0" border="0" width="700">
          <tr><td>
              <table class="bottomborder" cellspacing="0" cellpadding="0" border="0" width="100%">
              <tr><td width="350" bgcolor="#3B5998">
                <img src="{{  asset('img/logo-left.jpg') }}"></td>
                  <td bgcolor="#3B5998"><table cellspacing="0" cellpadding="0" border="0" width="100%"><tr><td>
                  <table cellspacing="0" cellpadding="0" border="0" width="100%">
                  <tr><td><a href="/"><img src="{{ asset('img/logo-right.jpg') }}" border="0"></a></td>
                  <td width="100%" bgcolor="#3B5998">&nbsp;</td></tr></table></td></tr>
                  <tr><td><table cellspacing="0" cellpadding="4" border="0" width="100%"><tr height="21">
                  <!--<td bgcolor=#3B5998 width=10>&nbsp;</td>-->
                  <td bgcolor="#3B5998" valign="bottom">&nbsp;<a class="menu" href="{{ route('login') }}">login</a></td>
                  <td bgcolor="#3B5998" valign="bottom">&nbsp;<a class="menu" href="{{ route('register') }}">register</a></td>
                  <td bgcolor="#3B5998" valign="bottom">&nbsp;<a class="menu" href="#">about</a></td>
                  <td bgcolor="#3B5998" width="100%">&nbsp;</td>
                  </tr></table></td>
                  </tr></table>
              </td></tr></table>
          </td></tr>
          <tr><td><table cellspacing="0" cellpadding="2" border="0" width="100%">
              <tr><td valign="top">
              <table cellspacing="0" cellpadding="0" border="0" width="105">
                <tr><td>
                                    <table class="dashedtable" cellspacing="0" cellpadding="2" width="100%">
                      <tr><td align="right">
                          <p>
                        @auth
                          <input type="button" class="inputsubmit" value="home" onclick="javascript:document.location='{{ route('home') }}';">
                        @else
                          <form method="post" action="{{ route('login') }}">
                            @csrf
                            Email:<br>
                            <input type="text" class="inputtext" name="email"><br>
                            @error('email') <font color="red">{{ $message }}</font> @enderror
                            Password:<br>
                            <input type="password" class="inputtext" name="password"><br>
                            @error('password') <font color="red">{{ $message }}</font> @enderror
                            <center><input type="button" class="inputsubmit" value="register" onclick="javascript:document.location='{{ route('register') }}';">
                                  &nbsp;<input type="submit" class="inputsubmit" value="login"></center>
                          </form>
                        @endauth
                        <br>
                      </td></tr></table>
                           </td></tr>
              </table>
              </td><td width="595" valign="top">
                <table class="bordertable" cellspacing="0" cellpadding="0" border="1" width="100%"><tr><td>


        &nbsp;<center><p class="title">[ Login ]<p>
        <form method="post" action="{{ route('login') }}">
            @csrf
            <input type="hidden" name="page" value="">
            <table cellspacing="0" cellpadding="2" border="0">
            <tr><td>Email:</td>
            <td>
                <input type="text" class="inputtext" name="email" value="" size="30">
                @error('email') <font color="red">{{ $message }}</font> @enderror
            </td></tr>
            <tr><td>Password:</td>
            <td>
                <input type="password" class="inputtext" name="password" size="30">
                @error('password') <font color="red">{{ $message }}</font> @enderror
            </td></tr>
            <tr height="7"><td></td><td></td></tr>
            </table>
            <input type="submit" value="   Login   " class="inputsubmit">&nbsp;&nbsp;
            <input type="button" value="Register" class="inputsubmit" onclick="javascript:document.location='{{ route('register') }}';">
        </form>
        <br>
        <br>
        </center>

          </td></tr></table>
          </td></tr></table>
          <center>
          <p><a href="#">about</a>&nbsp;&nbsp;
          <a href="#">contact</a>&nbsp;&nbsp;
          <a href="#">faq</a>&nbsp;&nbsp;
          <a href="#">terms</a>&nbsp;&nbsp;
          <a href="#">privacy</a>
          <br>a IFMG/3rd year 2023 production
          <br>Thefacebook &copy; 2004
          </center><br>
          </td></tr></table>
</body>
</html>
