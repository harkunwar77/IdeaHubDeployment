function sign_in() {
  let f=document.getElementById('first').value;
  let l=document.getElementById('last').value;
  let e=document.getElementById('email').value;
  let p=document.getElementById('pass').value;
  if(f==="" || l==="" || e==="" || p ===""){
    alert("Please fill all fields");
  }
  else{
     window.open("http://localhost:8080/view_posts.html");
  }
}

//ques pop up//
function pop(){
  document.getElementById('question-panel').style.display='block';
}
// ques pop up ends//

// add ques start//
function post_it(){
  let val=document.getElementById('text').value;

  let val1 = {
    "question": val
  }
  let reqbody={
    method:'POST',
    body:JSON.stringify(val1),
    headers: new Headers({
      'content-type':"application/json"
    })
  }

  fetch("http://127.0.0.1:8000/hub/",reqbody)
}
// ad ques ends//

// ansbutton is hidded//
function post_answer(id,id2){
  document.getElementById(id).style.display='block';
  document.getElementById(id2).style.display='none';
}
// ans button is hidded end//

// when ans is posted//
function post_func(box_id, ques_id){
  let v=document.getElementById(box_id).value;

  let v2 = {
    "id": ques_id,
    "answers": v
  }
  let reqbody2={
    method:'PUT',
    body:JSON.stringify(v2),
    headers: new Headers({
      'content-type':"application/json"
    })
  }
  fetch("http://127.0.0.1:8000/hub2/"+ ques_id + "/",reqbody2)
  .then(response => response.json())
}
// ans is posted ends//

// when page loads//
function load(){
    fetch("http://127.0.0.1:8000/hub/")
    .then((res)=>res.json())
    .then((data)=>{
      for(let i=0; i < data.length; i++) {
         ques_val = data[i]['question'];
         ans_val = data[i]['answers'];
         id_val=data[i]['id'];
         id_answer = "ans" + id_val;
         id_button = id_val;
         box_id = "post-" + id_val;
         ques_id = id_val;
         if(ans_val===""){
           let parent_div = document.getElementById('parent_div');
           parent_div.innerHTML += `<div class="blog-post chil">
             <hr>
             <p></p>
             <p></p>
             <img class="thumbnail" src="images/${id_val}.jpg" style="height:350px; width:850px;">
             <p><b>Question-</b>${ques_val}</p>
             <div class="contact-panel ans_popup" id = "${id_answer}" data-toggler=".is-active">
               <form action="">
                 <div class="row">
                   <label class="ans-label">Your Answer *
                     <textarea id="${box_id}" rows="3"></textarea>
                   </label>
                 </div>
                 <div class="contact-panel-actions">
                   <input type="button" class="button submit-button post_ans" onclick=post_func("${box_id}","${ques_id}") value="Post" >
                 </div>
               </form>
             </div>
             <p><button type="button" class="btn btn-primary ans_button" id="${id_button}" onclick=post_answer("${id_answer}","${id_button}")>Answer</button> ${ans_val}</p>
             <p></p>
             </div>`
           }
          else{
            let parent_div = document.getElementById('parent_div');
            parent_div.innerHTML += `<div class="blog-post chil">
              <hr>
              <p></p>
              <p></p>
              <img class="thumbnail" src="images/${id_val}.jpg" style="height:350px; width:850px;">
              <p><b>Question-</b>${ques_val}</p>
              <p><b>Answer</b>- ${ans_val}</p>
              </div>`
          }
      }
    })
}
// page loads ends//

function search(){
    let searchWord = document.getElementById('searchWord').value;
    fetch("http://127.0.0.1:8000/hub2/search/"+ searchWord + "/")
    .then((res)=>res.json())
    .then((data)=>{
      document.getElementById('parent_div').innerHTML="";
      for(let i=0; i < data.length; i++) {
         ques_val = data[i]['question'];
         ans_val = data[i]['answers'];
         id_val=data[i]['id'];
         id_answer = "ans" + id_val;
         id_button = id_val;
         box_id = "post-" + id_val;
         ques_id = id_val;
         if(ans_val===""){
           let parent_div = document.getElementById('parent_div');
           parent_div.innerHTML += `<div class="blog-post chil">
             <hr>
             <p></p>
             <p></p>
             <img class="thumbnail" src="images/${id_val}.jpg" style="height:350px; width:850px;">
             <p><b>Question-</b>${ques_val}</p>
             <div class="contact-panel ans_popup" id = "${id_answer}" data-toggler=".is-active">
               <form action="">
                 <div class="row">
                   <label class="ans-label">Your Answer *
                     <textarea id="${box_id}" rows="3"></textarea>
                   </label>
                 </div>
                 <div class="contact-panel-actions">
                   <input type="button" class="button submit-button post_ans" onclick=post_func("${box_id}","${ques_id}") value="Post" >
                 </div>
               </form>
             </div>
             <p><button type="button" class="btn btn-primary ans_button" id="${id_button}" onclick=post_answer("${id_answer}","${id_button}")>Answer</button> ${ans_val}</p>
             <p></p>
             </div>`
           }
          else{
            let parent_div = document.getElementById('parent_div');
            parent_div.innerHTML += `<div class="blog-post chil">
              <hr>
              <p></p>
              <p></p>
              <img class="thumbnail" src="images/${id_val}.jpg" style="height:350px; width:850px;">
              <p><b>Question-</b>${ques_val}</p>
              <p><b>Answer</b>- ${ans_val}</p>
              </div>`
          }
      }
    })
}
