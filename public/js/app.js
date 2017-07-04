class Errors {
    constructor(){
        this.errors = {};
    }
    has(field){
        return this.errors.hasOwnProperty(field);
    }
    get(field) {
        if(this.errors[field]){
            return this.errors[field][0];
        }
    }
    record(errors) {
        this.errors = errors;
    }
    clear(field){
        if(field) {
            delete this.errors[field];
            return;
        };

        this.errors = {};
    }
    any(){
        return Object.keys(this.errors).length > 0;
    }
}
class Form {
    constructor(data) {
        this.originalData = data;

        for (let field in data) {
            this[field] = data[field];
        }

        this.errors = new Errors();
    }
     reset() {
        for (let field in this.originalData) {
            this[field] = '';
        }

        this.errors.clear();
    }
    data(){
        let data = Object.assign({}, this);

        delete data.originalData;
        delete data.errors;
        return data;
    }
    submit(requestType, url){
        axios[requestType](url, this.data())
            .then(response => {
                this.onSuccess(response.data);
                resolve(response.data);
            })
            .catch(error => {
                this.onFail(error.response.data);

                reject(error.response.data);
            });
    }
    onSuccess(response){
        alert(response.data.message);
        this.errors.clear();
        this.reset();
    }
    onFail(errors){
        this.errors.record(errors)
    }
}
new Vue({
    el: '#root',

    data:{
        form: new Form({
            name: '',
            description: ''
        })
    },
    methods: {
        onSubmit(){
            this.form.submit('post','/projects');
        },
        onSuccess(response){
            alert(response.data.message);

            // form.reset();
        }
    }
});
