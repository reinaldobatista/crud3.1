let content = document.getElementById('ajax-content')
function fetchContent(el) {
    console.log(el)
    let view=el.getAttribute('a-view')
    let folder=el.getAttribute('a-folder')
    fetch(`/${folder}/${view}`)
    .then(response => {
        let html = response.text()
        return html
    })
    .then(html => {
        content.innerHTML=html
    })

}


