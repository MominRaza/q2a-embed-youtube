<?php

	if (!defined('QA_VERSION')) {
		header('Location: ../../');
		exit;
	}

	qa_register_plugin_layer('qa-embed-layer.php', 'Embed Replacement Layer');
