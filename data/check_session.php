<?php
	// tenemos que llamar a "session_start()" siempre que queramos utilizar sesiones
	// ya sea para acceder a ellas o para almacenar valores
	session_start();

	// verificamos si la session "id" tiene datos
	if( isset($_SESSION['id']) ) {
		print 'authentified';
	}