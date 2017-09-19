var express = require("express");
var router = express.Router();
var signController = require('../controllers/signController');

//로그인 페이지
router.get('/in',signController.renderSignIn);
//로그인
router.post('/in',signController.signIn);
//회원가입 페이지
router.get('/up',signController.renderSignUp);
//회원가입
router.post('/up',signController.signUp);
module.exports = router;
