class Api {

    constructor(url) {
        this.url = url;
    }

    async view(endpoint) {
        return await fetch(this.url + endpoint);
    }

    async get(endpoint) {
        return await fetch(this.url + endpoint);
    }

    async post(endpoint, data) {
        return await fetch(this.url + endpoint, {
            method: 'POST',
            headers: {
                'Accept': 'application/json',
                'Content-Type': 'application/json',
                "X-Requested-With": "XMLHttpRequest",
                "X-CSRF-Token": $('meta[name="csrf-token"]').attr('content')
            },
            body: JSON.stringify(data)
        });
    }

}

export default Api;
