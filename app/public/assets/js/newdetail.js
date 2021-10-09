let categoryId = "";
let new_id = "";
function newDetail(){
        //new detail
        const queryString = window.location.search;
        const urlParams = new URLSearchParams(queryString);
        const id = urlParams.get('id')
        new_id = id;
        $.ajax({
            type: "GET",
            url: "http://localhost/api/news/detailnew?id="+id,
            dataType:"json",
            //data: dataString,
            success: function (response) {
                if(response.result === true) {  
                    categoryId = response.category
                    string = `           
                            <div class="row mt-4">
                                <div class="col">
                                    <h3>${response.title}</h3>
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col">
                                    <img src="${response.img}" class="img-fluid" alt="...">
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col mb-3">
                                    <p>
                                    ${response.content}
                                    </p>
                                </div>
                            </div>
                            `;
                        $("#detail").append(string);
                } else if(response.result === false) {
                    
                    $("#detail").append("Gösterilecek kategori bulunamadı..");
                }
            }
        })
}

function similarNews(){
    $.ajax({
        type: "GET",
        url: "http://localhost/api/news/getnews?page=1&category="+categoryId,
        dataType:"json",
        //data: dataString,
        success: function (response) {
            if(response.result === true) {  
                for (let i=0; i<5; i++)
                {
                    if (new_id == response.data.news[i].id)
                    {
                        continue;
                    }
                    string = `
                        <div class="card mt-5" style="width: 18rem;">
                            <a href="/main/detail/newdetail?id=${response.data.news[i].id}">
                                <img src="${response.data.news[i].img}" class="card-img-top" alt="...">
                            </a>
                        <div class="card-body">
                            <a href="/main/detail/newdetail?id=${response.data.news[i].id}">
                                <p class="card-text">${response.data.news[i].title.substring(0,40)+"..."}</p>
                            </a>
                        </div>
                        </div>`;
                    $("#similar").append(string);
                }
            }
        }        
    })
}

    $(document).ready(function(){
        newDetail();
        similarNews();
    });
    