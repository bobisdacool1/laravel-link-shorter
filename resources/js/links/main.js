const onCreateShortenedFormSubmit = async function (event) {
    event.preventDefault();

    const formData = new FormData(event.target);
    const params = Object.fromEntries(formData.entries());

    let url = event.target.action;
    let response = await asyncSendRequest(url, params);

    await notifyLinkShorted(response);
}

const asyncSendRequest = async (url, params) => {
    const settings = {
        method: 'POST',
        headers: {
            Accept: 'application/json',
            'Content-Type': 'application/json',
        },
        body: JSON.stringify(params)
    };
    try {
        const fetchResponse = await fetch(url, settings);
        return await fetchResponse.json();
    } catch (e) {
        return e;
    }
}

const notifyLinkShorted = async function (response) {
    let modal = document.getElementById('modal-link-created');
    let modalBodyHTML = modal.querySelector('.modal-body');
    let modalHeadTittleHTML = modal.querySelector('.modal-header .modal-title');
    let responseHTML;

    if (response.errors) {
        modalHeadTittleHTML.innerHTML = "Error!";
        responseHTML = document.createElement('ul');

        for (const [, error] of Object.entries(response.errors)) {
            let errorRow = document.createElement('li')
            errorRow.innerHTML = error.toString();

            responseHTML.appendChild(errorRow);
        }
    } else {
        modalHeadTittleHTML.innerHTML = "Succeed! The short link has been created   ";

        let url = response.data.short_link;

        let urlHTML = document.createElement('a');
        urlHTML.href = url;
        urlHTML.innerHTML = url;

        responseHTML = document.createElement('p');
        responseHTML.innerHTML = 'The short link is: ';
        responseHTML.appendChild(urlHTML);
    }

    modalBodyHTML.innerHTML = '';
    modalBodyHTML.appendChild(responseHTML);

    let BootstrapModal = new bootstrap.Modal(modal)
    BootstrapModal.show();
}

document.getElementById('create-shortened-link').addEventListener('submit', onCreateShortenedFormSubmit);
