
import ClassicEditor from '@ckeditor/ckeditor5-build-classic';
class MyUploadAdapter {
    uploadURL='';
    csrf = '';
    constructor( loader,url,token ) {
        this.loader = loader;
        this.uploadURL=url;
        this.csrf = $("input[name='_token']").val();
        
    }

    upload() {
        return this.loader.file
            .then( file => new Promise( ( resolve, reject ) => {
                this._initRequest();
                this._initListeners( resolve, reject, file );
                this._sendRequest( file );
            } ) );
    }

    abort() {
        if ( this.xhr ) {
            this.xhr.abort();
        }
    }

    _initRequest() {
        const xhr = this.xhr = new XMLHttpRequest();
        
        xhr.open( 'POST', this.uploadURL, true );
        xhr.responseType = 'json';
    }

    _initListeners( resolve, reject, file ) {
        const xhr    = this.xhr;
        const loader = this.loader;
        const genericErrorText = `Couldn't upload file: ${ file.name }.`;
        xhr.addEventListener( 'error', () => reject( genericErrorText ) );
        xhr.addEventListener( 'abort', () => reject() );
        xhr.addEventListener( 'load', ()  => {
            const response = xhr.response;
            if ( !response || response.error ) {
                return reject( response && response.error ? response.error.message : genericErrorText );
            }
            resolve( {
                default: response.url
            } );
            $("#fileName").val(response.fileName)
        } );
        if ( xhr.upload ) {
            xhr.upload.addEventListener( 'progress', evt => {
                if ( evt.lengthComputable ) {
                    loader.uploadTotal = evt.total;
                    loader.uploaded = evt.loaded;
                }
            } );
        }
    }

    _sendRequest( file ) {
        const data = new FormData();
        data.append( 'upload', file );
        data.append( '_token', this.csrf );
        this.xhr.send( data );
    }
}
export default class MyCKE{
    url = '';
    csrf='';
    InitializeEditor(DOMquerySelector,uploadURL,token){
        this.url=uploadURL;
        
        this.csrf = token;
        ClassicEditor.create(document.querySelector(DOMquerySelector),{
            extraPlugins:[this.MyCustomUploadAdapterPlugin]
        })
    }
    MyCustomUploadAdapterPlugin( editor ) {
        editor.plugins.get( 'FileRepository' ).createUploadAdapter = ( loader ) => {
            let url = window.uploadURL;
            return new MyUploadAdapter( loader,url,this.csrf );
        };
    }
}