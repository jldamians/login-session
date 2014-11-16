<?php
	// tenemos que llamar a "session_start()" siempre que queramos utilizar sesiones
	// ya sea para acceder a ellas o para almacenar valores
	session_start() ;

	// liberar todas las variables de sesión registradas
	session_unset() ;

	// destruye toda la información registrada de una sesión
	session_destroy() ;

