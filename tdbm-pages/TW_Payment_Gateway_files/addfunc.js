 function isCreditCard( CC ) 
 {                         
      if (CC.length > 19)
           return (false);

      sum = 0; mul = 1; l = CC.length;
      for (i = 0; i < l; i++) 
      {
           digit = CC.substring(l-i-1,l-i);
           tproduct = parseInt(digit ,10)*mul;
           if (tproduct >= 10)
                sum += (tproduct % 10) + 1;
           else
                sum += tproduct;
           if (mul == 1)
                mul++;
           else
                mul--;
      }
      if ((sum % 10) == 0)
           return (true);
      else
           return (false);
 }
// 
function verPanCvv(v,t,m1,m2,m3,m4,addF,pan,minP,maxP){
  var Fcvv2="false";
  if (t=="cvv") Fcvv2=eval(addF);

  if (((t=="pan" || t=="pan2") && v.value=="") || (t=="cvv" && Fcvv2 && v.value=="")){
         alert(m1+"! "+m4);
         v.focus();  
         return(false);
   }
  if (((t=="pan" || t=="pan2") && v.value.search(new RegExp('^[0-9]+$','g'))==-1) || (t=="cvv" && Fcvv2 && v.value.search(new RegExp('^[0-9]+$','g'))==-1) ){
         alert(m1+"! "+m2);
         v.focus();  
         return(false);
   }
  if ((t=="pan" || t=="pan2")){
      if (v.value.length <minP || v.value.length>maxP){
         alert(m1+"! "+m3);
         v.focus();  
         return(false);
      }
   }
  //
  //if (t=="pan" && !isCreditCard(v.value)){
  //  alert(m1);
  //  v.focus();  
  //  return(false);
  //}
  //
  if (t=="cvv" && Fcvv2){
      if (v.value.length !=3){
         alert(m1+"! "+m3);
         v.focus();  
         return(false);
      }
   }
   // Email 
   //var emailFld=document.getElementById(''
   var mF=document.getElementById('mF').elements;
   for (var i=0; i< mF.length; i++){
       if (mF[i].name=='emailuser' && mF[i].value!=""){
           if(!isValidEmail(mF[i].value)){
               alert('Invalid Email address!');
               mF[i].select() ;
               mF[i].focus() ;
               return false;
           } 
        break;
       }
   }
   //
   return(true)
}
//
function isValidEmail (email, strict)
{
  if ( !strict ) email = email.replace(/^s+|s+$/g, '');
  return (/^([a-z0-9_-]+.)*[a-z0-9_-]+@([a-z0-9][a-z0-9-]*[a-z0-9].)+[a-z]{2,4}$/i).test(email);
}
//
function cmp(a,b){
    return a>b;
}
function cvv2check(v){
  if ((v.value.search(new RegExp('^[0-9]+$','g'))==-1) || v.value=="" || v.value.length<3) return false;
  return true;
}
function captCheck(v,m0,m1,m2){
  if (v.value==""){alert(m0+": "+m2); v.focus();  return(false);}
  if ((v.value.search(new RegExp('^[0-9]+$','g'))==-1)) {alert(m0+": "+m1); v.focus(); return(false);}
  return true;
}
// test Bin in Pan
function testBininPan(pan,bin,msg){
  if (pan.value.substr(0,bin.length)!=bin){
     alert(msg);
     return false;
  }
  return true;
}
// Card Hoder check
HolderC=false;
function holderCheck(p,h,m,t){
    $.ajax({
       url:'/ShopBridge/holdercheck.jsp',
       dataType: 'json',
       type:'POST',
       async: false,
       data:{
	MerchantID: m,
	pan: p.value
       },
       success: function(obj){
          if(obj.resp=="true" && h.value==""){
            h.focus();
            alert(t);
          }else HolderC=true;
       }
    })
}
