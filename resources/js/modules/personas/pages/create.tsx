import { Head, useForm } from '@inertiajs/react';

export default function Create() {

    const {
        data,
        setData,
        post,
        processing,
        errors
    } = useForm({

        dni: '',
        nombres: '',
        apellido_paterno: '',
        apellido_materno: '',
        fecha_nacimiento: '',
        telefono: ''

    });

    function submit(e: React.FormEvent) {

        e.preventDefault();

        post('/personas');
    }

    return (
        <>
            <Head title="Nueva persona" />

            <form
                onSubmit={submit}
                className="max-w-xl space-y-4"
            >

                <div>

                    <label>DNI</label>

                    <input
                        value={data.dni}
                        onChange={e =>
                            setData('dni', e.target.value)
                        }
                    />

                    {errors.dni &&
                        <div>{errors.dni}</div>
                    }

                </div>

                <div>

                    <label>Nombres</label>

                    <input
                        value={data.nombres}
                        onChange={e =>
                            setData(
                                'nombres',
                                e.target.value
                            )
                        }
                    />

                </div>

                <div>

                    <label>Apellido paterno</label>

                    <input
                        value={data.apellido_paterno}
                        onChange={e =>
                            setData(
                                'apellido_paterno',
                                e.target.value
                            )
                        }
                    />

                </div>

                <button
                    type="submit"
                    disabled={processing}
                >
                    Guardar
                </button>

            </form>
        </>
    );
}