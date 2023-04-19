$(function() {
  get_data();
});

function get_data() {
  $.ajax({
      url: "result/ajax/",
      dataType: "json",
      success: data => {
        $("#comment-data")
          .find(".comment-visible")
          .remove();
        for (let i = 0; i < data.hobby_chats.length; i++) {
          
          let html = `
              <div class="media comment-visible">
                <div class="media-body comment-body">
                  <div class="row">
                      <span class="comment-body-user" id="name">${data.hobby_chats[i].user.name}</span>
                      <span class="comment-body-time" id="created_at">${data.hobby_chats[i].created_at}</span>
                  </div>
                  <span class="comment-body-content" id="comment">${data.hobby_chats[i].chat}</span>
                </div>
              </div>
            `;

          $("#comment-data").append(html);
        }
      },
      error: () => {
          alert("ajax Error");
      }
  });

  setTimeout("get_data()", 5000);
}