var http = require("http");

http.createServer(function(request,response){

  if(request.method=="POST"){
   
    request.on('data',function(data){
    console.log(data.body);
    console.log(data.toString());
    var Obj = JSON.parse(data);
   
    console.log(Obj.major);
    console.log(data.identifier);
     });
}
   }).listen(3000);

