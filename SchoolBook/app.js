const url = document.querySelectorAll(".urls");
const id = document.querySelectorAll(".id");
const likeBtn = document.querySelectorAll(".like");
const comments = document.querySelectorAll(".comments");
const commentDiv = document.querySelectorAll(".comment");
const commentBtn = document.querySelectorAll(".commentBtn");
const textArea = document.querySelectorAll(".textarea");
let comment = {};
const urls = [];
const ids = [];

url.forEach((element) => urls.push(element.value));
id.forEach((element) => ids.push(element.value));

async function toggleLikeBtn(index, number, removeClass, addClass) {
  likeBtn[index].classList.remove(removeClass);
  likeBtn[index].classList.add(addClass);
  let num = parseInt(likeBtn[index].children[0].innerHTML) + number;
  let url = urls[index] + "&like=" + num;
  const postLike = await fetch(url);
  const data = await postLike.json();
  likeBtn[index].children[0].innerHTML = data;
}

for (let i = 0; i < likeBtn.length; i++) {
  likeBtn[i].addEventListener("click", () => {
    if (likeBtn[i].classList.contains("btn-outline-danger")) {
      toggleLikeBtn(i, 1, "btn-outline-danger", "btn-danger");
    } else {
      toggleLikeBtn(i, -1, "btn-danger", "btn-outline-danger");
    }
  });
}

for (let i = 0; i < comments.length; i++) {
  comments[i].addEventListener("submit", function (e) {
    e.preventDefault();
    const formData = new FormData(this);
    fetch("http://localhost/schoolbook/includes/likes-comments.php", {
      method: "POST",
      body: formData,
    })
      .then((respose) => respose.json())
      .then((data) => {
        data.forEach((element) => {
          commentDiv[i].classList.remove("invisible");
          commentDiv[
            i
          ].innerHTML = `<div class="card-body">${element["comments"]}</div>`;
          textArea[i].value = "";
        });
      })
      .catch((e) => console.log(e));
  });
}
