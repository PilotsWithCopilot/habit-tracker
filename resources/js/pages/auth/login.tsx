import TelegramLoginButton from '@/components/login/TelegramLoginButton';
import AuthLayout from '@/layouts/auth-layout';
import { Head } from '@inertiajs/react';

interface LoginProps {
  status?: string;
}

export default function Login({ status }: LoginProps) {
  return (
    <AuthLayout
      title="Log in to your account"
      description="Click on the button below to log in with your Telegram account."
    >
      <Head title="Log in" />

      <div className="mb-4 flex justify-center">
        <TelegramLoginButton
          route={route('auth.telegram.callback')}
          botName={import.meta.env.VITE_TELEGRAM_BOT_NAME}
        />
      </div>

      {status && (
        <div className="mb-4 text-center text-sm font-medium text-green-600">{status}</div>
      )}
    </AuthLayout>
  );
}
