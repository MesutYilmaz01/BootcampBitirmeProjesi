function categoryResults(){

    const queryString = window.location.search;
    const urlParams = new URLSearchParams(queryString);
    const id = urlParams.get('id')

    $.ajax({
        type: "GET",
        url: "http://localhost/api/news/getnews?page=1&category="+id,
        dataType:"json",
        //data: dataString,
        success: function (response) {
            if(response.result === true) { 
                $("#news").append(`<h4 id="">${response.data.news[0].category} Kategorisi için sonuçlar gösteriliyor</h4>`)
            response.data.news.map((item) => {
                string = `
                        <div class="card mb-5 mt-4">
                            <div class="row g-0">
                                <div class="col-md-4">
                                    <a href="/main/detail/newdetail?id=${item.id}">
                                        <img src="${item.img}" class="img-fluid rounded-start" alt="..."/>
                                    </a>
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                    
                                        <a href="/main/detail/newdetail?id=${item.id}">
                                            <h5 class="card-title">${item.title.substring(0,20)+"..."}</h5>
                                            <p class="card-text">${item.content.substring(0,40)+"..."}</p>
                                            <p class="card-text"><small class="text-muted">${item.created}</small></p>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>`;
                        $("#news").append(string);
            })
            }
        }
     
    })
}
$(document).ready(function(){
    categoryResults();
});




