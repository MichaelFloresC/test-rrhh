import { Head, Link, router } from '@inertiajs/react';

interface Persona {
    id: number;
    dni: string;
    nombres: string;
    apellido_paterno: string;
    apellido_materno?: string;
}

interface Props {
    personas: {
        data: Persona[];
    };
    filtros: {
        buscar?: string;
    };
}

export default function Index({
    personas,
    filtros
}: Props) {

    const eliminar = (id: number) => {

        if (!confirm('¿Eliminar persona?')) {
            return;
        }

        router.delete(`/personas/${id}`);
    };

    return (
        <>
            <Head title="Personas" />

            <div className="p-6">

                <div className="flex justify-between">

                    <h1 className="text-2xl font-bold">
                        Personas
                    </h1>

                    <Link
                        href="/personas/crear"
                        className="rounded bg-black px-4 py-2 text-white"
                    >
                        Nueva persona
                    </Link>

                </div>

                <table className="mt-6 w-full">

                    <thead>
                        <tr>
                            <th>DNI</th>
                            <th>Apellidos</th>
                            <th>Nombres</th>
                            <th />
                        </tr>
                    </thead>

                    <tbody>

                        {personas.data.map(persona => (

                            <tr key={persona.id}>

                                <td>{persona.dni}</td>

                                <td>
                                    {persona.apellido_paterno}
                                    {' '}
                                    {persona.apellido_materno}
                                </td>

                                <td>
                                    {persona.nombres}
                                </td>

                                <td>

                                    <Link
                                        href={
                                            `/personas/${persona.id}/editar`
                                        }
                                    >
                                        Editar
                                    </Link>

                                    <button
                                        onClick={() =>
                                            eliminar(persona.id)
                                        }
                                    >
                                        Eliminar
                                    </button>

                                </td>

                            </tr>

                        ))}

                    </tbody>

                </table>

            </div>
        </>
    );
}