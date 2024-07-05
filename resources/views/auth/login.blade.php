<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - Sistema de Siguimiento App</title>
        <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx"
        crossorigin="anonymous"
        />
    </head>
    <body class="bg-info d-flex justify-content-center align-items-center vh-100">
        <div
        class="bg-white p-5 rounded-5 text-secondary shadow"
        style="width: 25rem"
        >
        <div class="d-flex justify-content-center">
            <img src="/assets/login-icon.svg" alt="login-icon" style="height: 7rem" />
        </div>
        <div class="text-center fs-1 fw-bold">Inicia sesión</div>
            <form class="form-signin" method="POST" >
            @csrf
                <div class="input-group mt-4">
                    <div class="input-group-text bg-info">
                        <img src="/assets/username-icon.svg" alt="username-icon" style="height: 1rem" />
                    </div>
                    <input class="form-control bg-light" type="email" id="email" name="email" autocomplete="current-email" placeholder="Correo electronico" required autofocus maxlength="255" />
                </div>

                <div class="input-group mt-1">
                    <div class="input-group-text bg-info">
                        <img src="/assets/password-icon.svg" alt="password-icon" style="height: 1rem" />
                    </div>
                        <input class="form-control bg-light" type="password" id="password" name="password" autocomplete="current-password" placeholder="Contraseña" required minlength="5" maxlength="15"/>
                </div>

                <div style="padding-top: 16%" >
                    <input type="submit" value="Ingresar" class="btn btn-info"
                            style="font-family: 'Times New Roman'; width: 100%; font-size: 20px; "/>
                </div>

                <!-- <div class="btn d-flex gap-2 justify-content-center border mt-3 shadow-sm" >
                    <img src="/assets/google-icon.svg" alt="google-icon" style="height: 1.6rem" />
                    <div class="fw-semibold text-secondary">Continue con Google</div>
                </div> -->
            </form>
        </div>
    </body>
</html>
