var express = require("express");
var router = express.Router();
var loginController = require('../controllers/loginController');

//로그인 페이지
router.get('/',loginController.renderLogin);
//로그인
router.post('/',loginController.login);
module.exports = router;
