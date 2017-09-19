//login 화면 출력
module.exports.renderSignIn = function(req,res){
  
  // 더미값 생성용
  // var createCheckInfo = require('../models/createCheckInfo');
  // createCheckInfo.inputUserInfo(res);
  
  res.render('../views/pages/login');
}
//session 정보가 없을 때 login 페이지로 redirect
module.exports.check = function(req,res,next){
  // console.log(req.session.user);
  if(req.session.user != undefined){
    next();
  }else{
    res.redirect('/sign/in');
  }
}

//로그인
module.exports.signIn = function(req,res,next){
  var std_id   = req.body.std_id; //입력한 아이디
  var password = req.body.password //입력한 패스워드
  // console.log(id);
  // console.log(pass);
  // console.log(req.body);
  
  //****************DB처리*******************
  
  var checkUser = require('../models/readcheckInfo');
  checkUser.checkUser(std_id,password,req,res);

  //****************************************
}


//회원가입페이지
module.exports.renderSignUp = function(req,res){
  
  res.render('../views/pages/signUp');
}

//회원가입
module.exports.signUp = function(req,res,next){

  var std_id    = req.body.std_id;
  var password  = req.body.inputPassword;
  var name      = req.body.inputName;
  var classInfo = req.body.inputClass;

  // console.log(req.body);
  // console.log(password);
  // console.log(name);
  // console.log(classInfo);
  
  //****************DB처리*******************
  
  var signUp = require('../models/createCheckInfo');
  signUp.signUpInfo(res,std_id,password,name,classInfo);

  //****************************************
}

