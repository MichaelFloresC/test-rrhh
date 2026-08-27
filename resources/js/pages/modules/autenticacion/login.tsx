import { Form, Head } from '@inertiajs/react';
import { LockKeyhole, Mail } from 'lucide-react';

export default function Login() {
    return (
        <>
            <Head title="Iniciar sesión" />

            <div className="flex w-full flex-col gap-6">
                <div className="text-center">
                    <h1 className="text-2xl font-semibold tracking-tight text-foreground">
                        Sistema de Recursos Humanos
                    </h1>

                    <p className="mt-2 text-sm text-muted-foreground">
                        Ingresa tus credenciales para continuar
                    </p>
                </div>

                <Form
                    action="/login"
                    method="post"
                    className="space-y-5"
                >
                    {({ errors, processing }) => (
                        <>
                            <div className="space-y-2">
                                <label
                                    htmlFor="email"
                                    className="text-sm font-medium text-foreground"
                                >
                                    Correo electrónico
                                </label>

                                <div className="relative">
                                    <Mail className="absolute left-3 top-1/2 size-4 -translate-y-1/2 text-muted-foreground" />

                                    <input
                                        id="email"
                                        name="email"
                                        type="email"
                                        autoComplete="email"
                                        autoFocus
                                        placeholder="admin@rrhh.local"
                                        className="
                                            h-11 w-full rounded-lg border border-input
                                            bg-background pl-10 pr-3
                                            text-sm text-foreground
                                            outline-none
                                            transition
                                            placeholder:text-muted-foreground
                                            focus:border-primary
                                            focus:ring-2
                                            focus:ring-primary/20
                                        "
                                    />
                                </div>

                                {errors.email && (
                                    <p className="text-sm font-medium text-destructive">
                                        {errors.email}
                                    </p>
                                )}
                            </div>

                            <div className="space-y-2">
                                <label
                                    htmlFor="password"
                                    className="text-sm font-medium text-foreground"
                                >
                                    Contraseña
                                </label>

                                <div className="relative">
                                    <LockKeyhole className="absolute left-3 top-1/2 size-4 -translate-y-1/2 text-muted-foreground" />

                                    <input
                                        id="password"
                                        name="password"
                                        type="password"
                                        autoComplete="current-password"
                                        placeholder="Ingresa tu contraseña"
                                        className="
                                            h-11 w-full rounded-lg border border-input
                                            bg-background pl-10 pr-3
                                            text-sm text-foreground
                                            outline-none
                                            transition
                                            placeholder:text-muted-foreground
                                            focus:border-primary
                                            focus:ring-2
                                            focus:ring-primary/20
                                        "
                                    />
                                </div>

                                {errors.password && (
                                    <p className="text-sm font-medium text-destructive">
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
                                    className="size-4 rounded border-input"
                                />

                                <label
                                    htmlFor="remember"
                                    className="text-sm text-muted-foreground"
                                >
                                    Recordarme
                                </label>
                            </div>

                            <button
                                type="submit"
                                disabled={processing}
                                className="
                                    flex h-11 w-full items-center justify-center
                                    rounded-lg bg-primary
                                    px-4 text-sm font-medium
                                    text-primary-foreground
                                    transition
                                    hover:opacity-90
                                    disabled:cursor-not-allowed
                                    disabled:opacity-50
                                "
                            >
                                {processing
                                    ? 'Ingresando...'
                                    : 'Iniciar sesión'}
                            </button>
                        </>
                    )}
                </Form>

                <p className="text-center text-xs text-muted-foreground">
                    Sistema RR.HH. · Laravel 13 + Inertia + React
                </p>
            </div>
        </>
    );
}