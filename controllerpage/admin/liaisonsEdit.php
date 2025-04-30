<?php
include "model/bd.liaison.inc.php";

$liaison = getLiaisonById($data['id']);
include "vue/admin/viewLiaisonEdit.php";