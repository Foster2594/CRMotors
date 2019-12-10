<script>
    document.getElementById('idProvincia').addEventListener('change',cantones);
    document.getElementById('idCanton').addEventListener('change',distritos);
    function cantones() {
        alert('hola');
        let provincia=document.getElementById('idProvincia').value,
            cantoList='',
            data={provincia};
        axios.post('{{ route('search.canton') }}',data).then( response=>{
            response.data.forEach( data =>{
                cantoList+=`<option value=`+data.idCanton+`>`+data.nombre+`</option>`;
            });
            $('#idCanton').html(cantoList);
        });
    }
    function distritos() {
        let canton=document.getElementById('idCanton').value,
            DistritoList='',
            data={canton};
        axios.post('{{ route('search.distrito') }}',data).then( response=>{
            response.data.forEach( data =>{
                DistritoList+=`<option value=`+data.idDistrito+`>`+data.nombre+`</option>`;
            });
            $('#idDistrito').html(DistritoList);
        });
    }
</script>