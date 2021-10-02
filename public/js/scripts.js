

// Elementos HTML
const elEliminarRegistro = document.querySelectorAll('.eliminarRegistro');
const sltAlumnos = document.querySelector('#sltAlumnos');
const tbodyHome = document.querySelector('#tbodyHome');

document.addEventListener('DOMContentLoaded', function () {

    refrescarTabla(sltAlumnos.value);

    elEliminarRegistro.forEach((element) => {
        element.addEventListener('click', (e) => {
            e.preventDefault();
            eliminarRegistro(element.href);
        });
    });

    sltAlumnos.addEventListener('change', () => {
        tbodyHome.innerHTML = '';
        refrescarTabla(sltAlumnos.value);
    });

}, false);


const eliminarRegistro = (url) => {
    Swal.fire({
        icon: 'error',
        title: `Eliminar registro?`,
        showCancelButton: true,
        confirmButtonText: 'Si, acepto.',
        cancelButtonText: `Cancelar`,
    }).then((result) => {
        if (result.isConfirmed) {
            peticionDelete(url, (data) => {
                if (!data.success) {
                    Swal.fire({
                        icon: 'error',
                        title: data.msg,
                        showConfirmButton: true,
                    });
                }
                Swal.fire({
                    icon: 'success',
                    title: data.msg,
                    showConfirmButton: false,
                })
                setTimeout(() => {
                    window.location = data.location;
                }, 1000);

            });
        }
    })
};


const peticionDelete = (url, callback) => {
    axios({
        method: 'delete',
        url
    })
        .then(function (response) {
            callback(response.data);
        })
        .catch(function (error) {
            console.log(error);
        })
};


const refrescarTabla = (valor) => {
    axios({
        method: 'get',
        url: '/verInformacionAlumno',
        params: {
            valor
        }
    })
        .then(function (response) {
            let html = '';
            const alumnos = response.data.alumnos.length > 1
                ? response.data.alumnos
                : [response.data.alumnos];

            alumnos.forEach((alumno)=> {
                let mat = '';
                response.data.mxg.forEach((materia)=> {
                    if(materia.grd_id == alumno.grado[0].grd_id){
                        mat += `${materia.mat_nombre} `;
                    };
                });

                html += `
                <tr class="border-bottom">
                <td>
                    <div class="p-2">
                        <span class="d-block font-weight-bold">${alumno.alm_nombre}</span>
                    </div>
                </td>
                <td>
                    <div class="p-2 d-flex flex-row align-items-center mb-2">
                        <span>${alumno.grado[0].grd_nombre}</span>
                    </div>
                </td>
                <td>
                    <div class="p-2 d-flex flex-row align-items-center mb-2">
                        <span>
                            ${mat}
                        </span>
                    </div>
                </td>
            </tr>
                `;

            });
            tbodyHome.innerHTML = html;

        })
        .catch(function (error) {
            console.log(error);
        })
};
