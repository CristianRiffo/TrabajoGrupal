<style>
*{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    text-decoration: none;
    font-family: 'Roboto', sans-serif;
}

body{
    background-image: url(../img/);
    background-size: cover;
    background-repeat: no-repeat;
    background-position: center;
    background-attachment: fixed;
}

main{
    width: 100%;
    padding: 20px;
    margin: auto;
    margin-top: 100px;
}

.contenedor__todo{
    width: 100%;
    max-width: 800px;
    margin: auto;
    position: relative;
}

.caja__trasera{
    width: 100%;
    padding: 10px 20px;
    display: flex;
    justify-content: center;
    -webkit-backdrop-filter: blur(10px);
    backdrop-filter: blur(10px);
    background-color: rgba(15, 45, 75, 0.79);

}

.caja__trasera-register input{
    padding: 10px;
    background-color:rgb(255, 255, 255);
    color: rgba(15, 45, 75, 0.79);
}

.caja__trasera div{
    margin: 100px 40px;
    color: rgb(255, 255, 255);
    transition: all 500ms;
}


.caja__trasera div p,
.caja__trasera button{
    margin-top: 30px;
}

.caja__trasera div h3{
    font-weight: 400;
    font-size: 26px;
}

.caja__trasera div p{
    font-size: 16px;
    font-weight: 300;
}

.caja__trasera button{
    padding: 10px 40px;
    border: 2px solid #fff;
    font-size: 14px;
    background: transparent;
    font-weight: 600;
    cursor: pointer;
    color: white;
    outline: none;
    transition: all 300ms;
}

.caja__trasera button:hover{
    background: #ffffff;
    color: #46A2FD;
}

/*Formularios*/

.contenedor__login-register{
    display: flex;
    align-items: center;
    width: 100%;
    max-width: 380px;
    position: relative;
    top: -185px;
    left: 10px;

}

.contenedor__login-register form{
    width: 100%;
    padding: 80px 20px;
    background: rgb(255, 255, 255);
    position: absolute;
    border-radius: 20px;
}

.contenedor__login-register form h2{
    font-size: 30px;
    text-align: center;
    margin-bottom: 20px;
    color: #46A2FD;
}

.contenedor__login-register form input{
    width: 100%;
    margin-top: 20px;
    padding: 10px;
    border: none;
    background: #F2F2F2;
    font-size: 16px;
    outline: none;
}

.contenedor__login-register button{
    padding: 10px 40px;
    margin-top: 40px;
    border: none;3
    font-size: 14px;
    background: rgba(15, 45, 75, 0.79);
    font-weight: 600;
    cursor: pointer;
    color: white;
    outline: none;
    width:100%;
}

.formulario__login{
    opacity: 1;
    display: block;
}
.formulario__register{
    display: none;
}


</style>
<main>

        <div class="contenedor__todo">
            <div class="caja__trasera">
                <div class="caja__trasera-login">
                    <h3>¿Ya tienes una cuenta?</h3>
                    <p>Inicia sesión para entrar en la página</p>
                    <button id="btn__iniciar-sesion">Iniciar Sesión</button>
                </div>
                <div class="caja__trasera-register">
                    <h3>¿Aún no tienes una cuenta?</h3>
                    <p>Regístrate para que puedas iniciar sesión</p>
                    <a href="/register">
                        <input type="button" value="Registrarse" />
                     </a>
                </div>
            </div>

            <!--Formulario de Login y registro-->
            <div class="contenedor__login-register">
                <!--Login-->
                <form class="formulario__login" method="POST" action="{{ route('login') }}">
                @csrf
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTIc0-3pvaJ4jwnEMD1r5WA94Noh_UtnUV1Iw&s" alt="logo AIEP" width="100" height="100">
    
                    <h2>Log in </h2>
                    <input type="text" placeholder="Correo Electronico" name="email" :value="old('email')">
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />

                    <input type="password" placeholder="Contraseña" name="password">
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    
                    <button>Ingresar</button>
                     
                </form>


            </div>
        </div>

    </main>
