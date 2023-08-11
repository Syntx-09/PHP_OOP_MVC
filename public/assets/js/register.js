const signup = document.getElementById('btn-register');

signup.addEventListener('click', () => {
    const formData = new FormData(document.querySelector('form'))
    fetch('/auth/model.php', {
        method: 'POST',
        body: formData
    })
    .then(res => {
        status = res.status
        return res.text()
    })
    .then(data => {
        alert(data)
        if (status == 200)
        location.href = "./login.html"
    })
    .catch(err => { alert(err) })
})


