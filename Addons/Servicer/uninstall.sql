DELETE FROM `wp_attribute` WHERE `model_name`='servicer';
DELETE FROM `wp_model` WHERE `name`='servicer' ORDER BY id DESC LIMIT 1;
DROP TABLE IF EXISTS `wp_servicer`;


