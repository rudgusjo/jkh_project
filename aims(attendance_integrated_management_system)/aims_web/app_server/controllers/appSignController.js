
//로그인
module.exports.appSignIn = function(req,res,next){
  var std_id   = req.body.studentid; 
  var password = req.body.password;
  // var name     = req.body.name;
  // var classInfo= req.body.class;
  // console.log(id);
  // console.log(pass);
  // console.log(req.body);
  
  //****************DB처리*******************
  
  var checkUser = require('../models/readcheckInfo');
  checkUser.checkAppUser(std_id,password,req,res);

  // return true;
}

//회원가입
module.exports.appSignUp = function(req,res,next){

  var std_id     = req.body.studentid;
  var password  = req.body.password;
  var name      = req.body.name;
  var classInfo = req.body.class;

  // console.log(req.body);
  // console.log(password);
  // console.log(name);
  // console.log(classInfo);
  
  //****************DB처리*******************
  
  var appSignUp = require('../models/createCheckInfo');
  appSignUp.appSignUpInfo(res,std_id,password,name,classInfo);

  //****************************************

  // return true;
}
