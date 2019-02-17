<?php
/**
 * Pterodactyl - Panel
 * Copyright (c) 2015 - 2017 Dane Everitt <dane@daneeveritt.com>.
 *
 * This software is licensed under the terms of the MIT license.
 * https://opensource.org/licenses/MIT
 */

return [
    'location' => [
        'no_location_found' => 'No se pudo localizar un registro coincidente el código corto.',
        'ask_short' => 'Ubicación De Código Corto',
        'ask_long' => 'Descripción De La Localización',
        'created' => 'Creado con éxito una nueva ubicación (:name) con un ID :id.',
        'deleted' => 'Elimina correctamente la ubicación solicitada.',
    ],
    'user' => [
        'search_users' => 'Introduzca un nombre de Usuario, UUID, o Dirección de Correo electrónico',
        'select_search_user' => 'Id del usuario para borrar (Usa 0, para buscar).',
        'deleted' => 'Usuario borrado con éxito desde el Panel de.',
        'confirm_delete' => 'Está seguro de que desea borrar este usuario desde el Panel?',
        'no_users_found' => 'Los usuarios No se encontraron resultados para el término de búsqueda proporcionado.',
        'multiple_found' => 'Varias cuentas se han encontrado para la proporcionada por el usuario, no se puede eliminar un usuario, porque de el --no-interacción de la bandera.',
        'ask_admin' => 'Es este usuario administrador?',
        'ask_email' => 'Dirección De Correo Electrónico',
        'ask_username' => 'Nombre de usuario',
        'ask_name_first' => 'Primer Nombre',
        'ask_name_last' => 'Apellido',
        'ask_password' => 'Contraseña',
        'ask_password_tip' => 'Si desea crear una cuenta con una contraseña aleatoria enviado por correo electrónico al usuario, vuelva a ejecutar este comando (CTRL+C) y pasar el `--no-password` de la bandera.',
        'ask_password_help' => 'Las contraseñas deben tener al menos 8 caracteres y contener al menos una letra mayúscula y el número.',
        '2fa_help_text' => [
            'Este comando desactivará la autenticación de 2 factores para la cuenta de un usuario si está habilitada. Esto sólo debe ser utilizado como una cuenta de recuperación de comando si el usuario está bloqueado de su cuenta.',
            'Si esto no es lo que quería hacer, presione CTRL+C para salir de este proceso.',
        ],
        '2fa_disabled' => '2-Factor de autenticación ha sido desactivado por :email.',
    ],
    'schedule' => [
        'output_line' => 'Despacho de trabajo para la primera tarea en `programar` (:hash).',
    ],
    'maintenance' => [
        'deleting_service_backup' => 'Eliminar el servicio de copia de seguridad de archivo :file.',
    ],
    'server' => [
        'rebuild_failed' => 'Reconstruir la solicitud de ":name" (#:id) en el nodo ":node" con el error: :message',
    ],
    'environment' => [
        'mail' => [
            'ask_smtp_host' => 'Host SMTP (e.g. smtp.gmail.com)',
            'ask_smtp_port' => 'Puerto SMTP',
            'ask_smtp_username' => 'El nombre de Usuario SMTP',
            'ask_smtp_password' => 'Contraseña SMTP',
            'ask_mailgun_domain' => 'Mailgun De Dominio',
            'ask_mailgun_secret' => 'Mailgun Secreto',
            'ask_mandrill_secret' => 'Mandrill Secreto',
            'ask_postmark_username' => 'Matasellos Clave de API',
            'ask_driver' => 'El controlador que debe ser utilizado para el envío de correos electrónicos?',
            'ask_mail_from' => 'Dirección de correo electrónico los correos electrónicos se originan a partir de',
            'ask_mail_name' => 'Nombre que los correos electrónicos deben aparecer a partir de',
            'ask_encryption' => 'Método de encriptación a utilizar',
        ],
        'database' => [
            'host_warning' => 'Es muy recomendable no usar "localhost" como el host de base de datos, como hemos visto, los frecuentes problemas de conexión de socket. Si desea utilizar una conexión local debe ser el uso de "127.Cero.Cero.1".',
            'host' => 'Host De Base De Datos',
            'port' => 'Puerto De Base De Datos',
            'database' => 'Nombre De Base De Datos',
            'username_warning' => 'El uso de la "raíz" de la cuenta para las conexiones de MySQL no sólo es muy mal visto, no está permitido por esta aplicación. Necesitarás haber creado un usuario de MySQL para este software.',
            'username' => 'Base De Datos De Nombre De Usuario',
            'password_defined' => 'Parece que ya tiene un usuario y contraseña de conexión definido, te gustaría cambiar?',
            'password' => 'Contraseña De Base De Datos',
            'connection_error' => 'No se puede conectar con el servidor MySQL usando los credenciales. El error devuelto fue ":error".',
            'creds_not_saved' => 'Sus credenciales de conexión NO se han guardado. Usted tendrá que proporcionar conexión válida la información antes de proceder.',
            'try_again' => 'Volver y probar otra vez?',
        ],
        'app' => [
            'app_url_help' => 'La dirección URL de la aplicación DEBE comenzar con https:// o http:// dependiendo de si usted está usando SSL o no. Si no se incluye el esquema de sus correos electrónicos y otros contenidos proporcionará un enlace a la ubicación incorrecta.',
            'app_url' => 'Dirección URL de la aplicación',
            'timezone_help' => 'La zona horaria debe coincidir con una de las zonas horarias compatibles de PHP. Si usted no está seguro, por favor consulte http://php.net/manual/es/zonas horarias.php.',
            'timezone' => 'La Zona Horaria De Aplicación',
            'cache_driver' => 'Caché De Controlador',
            'session_driver' => 'Controlador De Sesión',
            'using_redis' => 'Ha seleccionado el controlador Redis para una o más opciones, proporcione la información de conexión válida a continuación. En la mayoría de los casos se pueden utilizar los valores predeterminados a menos que usted haya modificado su configuración.',
            'redis_host' => 'Redis Host',
            'redis_password' => 'Redis Contraseña',
            'redis_port' => 'Redis Puerto',
            'redis_pass_defined' => 'Parece una contraseña ya está definida para Redis, te gustaría cambiar?',
            'redis_pass_help' => 'De forma predeterminada, un servidor Redis instancia no tiene contraseña ya que se ejecuta localmente y inaccessable para el mundo exterior. Si este es el caso, simplemente pulsa enter sin introducir un valor.',
        ],
        'oauth2' => [
            'oauth2_warning' => 'La configuración OAuth2 es una opción avanzada, úsela únicamente si sabe qué está haciendo.',
            'clientId' => 'ID de Cliente OAuth2',
            'clientSecret' => 'Clave Secreta OAuth2',
            'urlAuthorize' => 'URL de autorización OAuth2',
            'urlAccessToken' => 'Token de acceso URL OAuth2 ',
            'urlResourceOwnerDetails' => 'URL de información de usuario OAuth2.',
            'ask_proxy' => '¿Le gustaría usar una proxy para OAuth2?',
            'proxy' => 'URL Proxy y Puerto (IP:puerto).',
            'resource_keys_help' => 'Si no sabe qué claves de recursos se usan en su servidor Oauth2, compruébelo en la documentación o contacte a su proveedor.',
            'id' => 'ID OAuth2 Resource Key',
            'username' => 'Username OAuth2 Resource Key',
            'email' => 'Email OAuth2 Resource Key',
            'ask_first_name' => '¿Su servidor/proveedor OAuth2 da el nombre del usuario?',
            'first_name' => 'Clave de Recurso OAuth2 para el Nombre',
            'ask_last_name' => '¿Su servidor/proveedor OAuth2 da el apellido del usuario?',
            'last_name' => 'Clave de Recurso OAuth2 para el Apellido',
            'create_user' => 'Would you like to only allow users with an account to login or create one if the user doesn\'t have one?',
            'create_user_options' => [
                'only_allow_login' => 'Only allow users with an existing account',
                'create' => 'Create a new user',
            ],
            'create_user_warning' => [
                'only_allow_login' => 'You will have to create users with an OAuth2 ID from the admin page or convert existing accounts.',
                'create' => 'Tener un servidor OAuth2 privado o una aplicación privada es recomendado, ya que esta característica no evita que cualquiera pueda iniciar sesión a través de OAuth2.'
            ],
            'update_user' => '¿Le gustaría actualizar los detalles del usuario usando OAuth2 después de cada inicio de sesión?',
            'setup_finished' => [
                'OAuth2 ha sido configurado, si desea eliminarlo,elmine \'OAUTH2_CLIENT_ID\' de su archivo ENV.',
                'Si le gustaría desactivar la proxy (si está puesta), elimine \'OAUTH2_URL_PROXY_URL\' de su archivo ENV.',
                'Para comprobar si funciona, cierre sesión e inicie a través del nuevo botón "OAuth2".',
            ],
            'redirect_uri_warning' => 'Por favor, configure la URI de redirección como \''.env('APP_URL') .'/auth/login/oauth2/callback'.'\' en su servidor/proveedor OAuth2.',
            'not_official' => 'Esta no es una característica oficial, por favor contacte a jer3m01#0001 en Discord para obtener ayuda.',
        ],
    ],
];
