import { useEffect } from 'react';

type Props = {
  route: string;
  botName: string;
};

export default function TelegramLoginButton({ route, botName }: Props) {
  useEffect(() => {
    const script = document.createElement('script');
    script.src = 'https://telegram.org/js/telegram-widget.js';
    script.async = true;
    script.setAttribute('data-telegram-login', botName);
    script.setAttribute('data-size', 'large');
    script.setAttribute('data-userpic', 'false');
    script.setAttribute('data-auth-url', route);
    script.setAttribute('data-request-access', 'write');
    document.getElementById('telegram-login')?.appendChild(script);
  }, [botName, route]);

  return <div id="telegram-login"></div>;
}
