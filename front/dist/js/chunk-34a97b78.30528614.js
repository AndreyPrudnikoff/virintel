(window["webpackJsonp"]=window["webpackJsonp"]||[]).push([["chunk-34a97b78"],{"03bb":function(t,s,a){"use strict";var e=a("05fa"),i=a.n(e);i.a},"05fa":function(t,s,a){},4002:function(t,s,a){},a55b:function(t,s,a){"use strict";a.r(s);var e=function(){var t=this,s=t.$createElement,a=t._self._c||s;return a("div",[a("main",{staticClass:"main"},[t.isLoggedIn?a("div",[a("ThankYou")],1):a("div",{staticClass:"container "},[a("div",{staticClass:"row main-content--wrapper"},[t.forgotPass?a("div",{staticClass:"forgot_wrap"},[t.submitedEmail?a("div",{staticClass:"pop-up-wrapper"},[a("div",{staticClass:"pop-up"},[a("svg",{attrs:{width:"48",height:"47",viewBox:"0 0 48 47",fill:"none",xmlns:"http://www.w3.org/2000/svg"}},[a("path",{attrs:{d:"M46.2559 23.5C46.2559 35.635 36.3071 45.5 24.0003 45.5C11.6935 45.5 1.74463 35.635 1.74463 23.5C1.74463 11.365 11.6935 1.5 24.0003 1.5C36.3071 1.5 46.2559 11.365 46.2559 23.5Z",stroke:"#15416B","stroke-width":"3"}}),a("line",{attrs:{y1:"-1.5",x2:"11.7708",y2:"-1.5",transform:"matrix(0.705014 0.709193 -0.705014 0.709193 11.9136 23.499)",stroke:"#15416B","stroke-width":"3"}}),a("line",{attrs:{y1:"-1.5",x2:"22.4738",y2:"-1.5",transform:"matrix(-0.705859 0.708353 -0.705859 -0.708353 36.0864 15.9189)",stroke:"#15416B","stroke-width":"3"}})]),a("h2",[t._v("Password has been reset!")]),a("button",{staticClass:"handle-btn-sbm",on:{click:function(s){return s.preventDefault(),t.closeModal(s)}}},[t._v("Close")])])]):a("div",{staticClass:"forgot"},[a("h2",{staticClass:"forgot_title"},[t._v("Forgot password?")]),a("p",{staticClass:"forgot_body"},[t._v("Please, enter your registered email address. We will get back to you with the reset password link.")]),a("form",[a("input",{directives:[{name:"model",rawName:"v-model",value:t.subEmail,expression:"subEmail"}],staticClass:"form-control input-field",attrs:{type:"email",placeholder:"E-mail",required:""},domProps:{value:t.subEmail},on:{input:function(s){s.target.composing||(t.subEmail=s.target.value)}}}),a("button",{staticClass:"handle-btn-sbm",on:{click:function(s){return s.preventDefault(),t.submitEmail(s)}}},[t._v("Submit")])])])]):a("section",{staticClass:"main-content"},[a("h1",[t._v("Welcome back!")]),a("span",{staticClass:"signin"},[t._v("Let's get started!")]),a("form",{staticClass:"login-form",on:{submit:function(s){return s.preventDefault(),t.submitHandler(s)}}},[a("div",{staticClass:"row"},[a("div",{staticClass:"col"},[a("input",{directives:[{name:"model",rawName:"v-model",value:t.userData.email,expression:"userData.email"}],staticClass:"form-control input-field",attrs:{type:"email",placeholder:"Email",required:""},domProps:{value:t.userData.email},on:{input:function(s){s.target.composing||t.$set(t.userData,"email",s.target.value)}}}),t.errors.email?a("span",{staticClass:"text-danger"},[t._v(t._s(t.errors.email[0]))]):t._e()])]),a("div",{staticClass:"row"},[a("div",{staticClass:"col"},[a("input",{directives:[{name:"model",rawName:"v-model",value:t.userData.password,expression:"userData.password"}],staticClass:"form-control input-field",attrs:{id:"password-field",type:"password",name:"password",placeholder:"Password",required:""},domProps:{value:t.userData.password},on:{input:function(s){s.target.composing||t.$set(t.userData,"password",s.target.value)}}}),t.errors.password?a("span",{staticClass:"text-danger"},[t._v(t._s(t.errors.password[0]))]):t._e(),a("span",{staticClass:"field-icon toggle-password",class:{"fa fa-eye fa-eye-slash":!t.slash,"fa fa-fw fa-eye":t.slash},on:{click:[function(s){t.slash=!t.slash},t.togglePassword]}})])]),a("a",{attrs:{id:"forgot",href:"#"},on:{click:function(s){s.preventDefault(),t.forgotPass=!t.forgotPass}}},[t._v("Forgot password?")]),a("input",{staticClass:"handle-btn-sbm",attrs:{type:"submit",value:"Sign in"}})]),a("span",[t._v("Don’t have an account? ")]),a("router-link",{staticClass:"already-have-acc",attrs:{to:"/sign-up"}},[t._v(" Sign up")])],1)])])])])},i=[],r=a("f170"),o=a("f9df"),n=function(){var t=this,s=t.$createElement,a=t._self._c||s;return a("div",[a("div",{attrs:{id:"thankYou"}},[t._v("Thank you, "),a("p",{staticClass:"userName"},[t._v(t._s(t.isUser.name)+"!")]),a("br"),t._v(" This is your "),a("b",[t._v("VirintelID")]),a("h2",{attrs:{id:"userId"}},[t._v(t._s(t.isUser.id))])]),a("div",[a("router-link",{attrs:{to:t.path}},[t._v("My profile")])],1)])},l=[],u=a("2f62"),d={name:"ThankYou",computed:{...Object(u["b"])(["isUser","path"])},async mounted(){await this.$store.dispatch("authUser")}},c=d,m=(a("03bb"),a("2877")),p=Object(m["a"])(c,n,l,!1,null,null,null),f=p.exports,h={name:"Login",components:{ThankYou:f,OuterHeader:r["a"]},data(){return{forgotPass:!1,submitedEmail:!1,subEmail:"",slash:!1,form:!0,userData:{email:"",password:""},errors:[]}},methods:{togglePassword(){const t=document.getElementById("password-field");"password"===t.getAttribute("type")?t.setAttribute("type","text"):t.setAttribute("type","password")},submitHandler(){o["a"].login(this.userData).then(t=>{this.$store.commit("LOGIN",!0),localStorage.setItem("token",t.data.access_token),this.form=!1}).catch(t=>{422===t.response.status&&(this.errors=t.response.data.errors)})},closeModal(){this.submitedEmail=!this.submitedEmail,this.forgotPass=!this.forgotPass},submitEmail(){this.subEmail.length>=3&&(this.submitedEmail=!this.submitedEmail,this.subEmail="")}},computed:{...Object(u["b"])(["isLoggedIn"])},mounted(){this.isLoggedIn&&this.$store.dispatch("authUser")}},v=h,b=(a("b868"),Object(m["a"])(v,e,i,!1,null,"56c35dbc",null));s["default"]=b.exports},b868:function(t,s,a){"use strict";var e=a("4002"),i=a.n(e);i.a}}]);
//# sourceMappingURL=chunk-34a97b78.30528614.js.map