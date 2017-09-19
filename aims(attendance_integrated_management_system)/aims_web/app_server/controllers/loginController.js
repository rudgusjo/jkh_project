//login 화면 출력
module.exports.renderLogin = function(req,res){
  
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
    res.redirect('/login');
  }
}

//로그인
module.exports.login = function(req,res,next){
  var id   = req.body.email; //입력한 아이디
  var pass = req.body.password //입력한 패스워드
  // console.log(id);
  // console.log(pass);
  // console.log(req.body);
  
  //****************DB처리*******************
  
  var checkUser = require('../models/readcheckInfo');
  checkUser.checkUser(id,pass,req,res);

  //****************************************
}
