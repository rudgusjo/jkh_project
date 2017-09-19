var express = require('express');
var router = express.Router();
var indexController = require('../controllers/indexController');
var signController = require('../controllers/signController');

//메인 페이지
router.get('/',signController.check,indexController.renderIndex);

module.exports = router;
