import { Form, Head } from '@inertiajs/react';

export default function Login() {
    return (
        <>
            <Head title="Iniciar sesión" />

            <div className="flex min-h-screen items-center justify-center bg-gray-100 px-4">
                <div className="w-full max-w-md rounded-xl bg-white p-8 shadow-md">

                    <div className="mb-6 text-center">
                        <h1 className="text-2xl font-bold text-gray-900">
                            Iniciar sesión
                        </h1>

                        <p className="mt-2 text-sm text-gray-500">
                            Ingresa tus credenciales para acceder al sistema
                        </p>
                    </div>

                    <Form
                        action="/login"
                        method="post"
                        className="space-y-5"
                    >
                        {({ errors, processing }) => (
                            <>
                                <div>
                                    <label
                                        htmlFor="email"
                                        className="mb-1 block text-sm font-medium text-gray-700"
                                    >
                                        Correo electrónico
                                    </label>

                                    <input
                                        id="email"
                                        name="email"
                                        type="email"
                                        autoComplete="email"
                                        autoFocus
                                        className="w-full rounded-lg border border-gray-300 px-3 py-2 outline-none focus:border-gray-500"
                                        placeholder="usuario@correo.com"
                                    />

                                    {errors.email && (
                                        <p className="mt-1 text-sm text-red-600">
                                            {errors.email}
                                        </p>
                                    )}
                                </div>

                                <div>
                                    <label
                                        htmlFor="password"
                                        className="mb-1 block text-sm font-medium text-gray-700"
                                    >
                                        Contraseña
                                    </label>

                                    <input
                                        id="password"
                                        name="password"
                                        type="password"
                                        autoComplete="current-password"
                                        className="w-full rounded-lg border border-gray-300 px-3 py-2 outline-none focus:border-gray-500"
                                        placeholder="********"
                                    />

                                    {errors.password && (
                                        <p className="mt-1 text-sm text-red-600">
                                            {errors.password}
                                        </p>
                                    )}
                                </div>

                                <div className="flex items-center gap-2">
                                    <input
                                        id="remember"
                                        name="remember"
                                        type="checkbox"
                                        value="1"
                                        className="rounded border-gray-300"
                                    />

                                    <label
                                        htmlFor="remember"
                                        className="text-sm text-gray-700"
                                    >
                                        Recordarme
                                    </label>
                                </div>

                                <button
                                    type="submit"
                                    disabled={processing}
                                    className="w-full rounded-lg bg-gray-900 px-4 py-2.5 font-medium text-white transition hover:bg-gray-800 disabled:cursor-not-allowed disabled:opacity-50"
                                >
                                    {processing
                                        ? 'Ingresando...'
                                        : 'Ingresar'}
                                </button>
                            </>
                        )}
                    </Form>
                </div>
            </div>
        </>
    );
}