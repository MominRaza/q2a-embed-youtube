<?php

	class qa_html_theme_layer extends qa_html_theme_base {

		function q_view_content($q_view) {
			if (isset($q_view['content'])){
				$q_view['content'] = $this->embed_replace($q_view['content']);
			}
			qa_html_theme_base::q_view_content($q_view);
		}

		function a_item_content($a_item) {
			if (isset($a_item['content'])) {
				$a_item['content'] = $this->embed_replace($a_item['content']);
			}
			qa_html_theme_base::a_item_content($a_item);
		}

		function embed_replace($text) {
			$type = array(
				array(
					'https{0,1}:\/\/w{0,3}\.*youtube\.com\/watch\?\S*v=([A-Za-z0-9_-]+)[^< ]*',
					'<div style="aspect-ratio: 16 / 9"><iframe style="width: 100%; height: 100%" width="560" height="615" src="https://www.youtube-nocookie.com/embed/$1" frameborder="0" allowfullscreen></iframe></div>'
				),
				array(
					'https{0,1}:\/\/w{0,3}\.*youtu\.be\/([A-Za-z0-9_-]+)[^< ]*',
					'<div style="aspect-ratio: 16 / 9"><iframe style="width: 100%; height: 100%" width="560" height="315" src="https://www.youtube-nocookie.com/embed/$1" frameborder="0" allowfullscreen></iframe></div>'
				)
			);

			foreach($type as $r) {
				$text = preg_replace('/<a[^>]+>'.$r[0].'<\/a>/i',$r[1],$text);
			}

			return $text;
		}
	}
