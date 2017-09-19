var express = require("express");
var router = express.Router();
var appSignController = require('../controllers/appSignController');

//로그인
router.post('/in',appSignController.appSignIn);
//회원가입
router.post('/up',appSignController.appSignUp);
module.exports = router;
