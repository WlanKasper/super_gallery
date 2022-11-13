<?php
    function getPublicPaintings() {
        $sql_q = "SELECT * FROM `public_paintings`";
		$arr_resp = selectQuery($sql_q);
        return $arr_resp;
    }

    function getPrivatePaintings() {
        $sql_q = "SELECT * FROM `private_paintings`";
		$arr_resp = selectQuery($sql_q);
        return $arr_resp;
    }
?>  