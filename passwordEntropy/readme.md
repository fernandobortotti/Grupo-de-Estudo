# Calculadora de entropia de senha

Essa aplicação é um software simples, feito em django, para calcular a entropia de senhas, além de verificar se a senha já foi vazada. Antes de começar é preciso entender um pouco melhor sobre a entropia de senhas.

## Teoria: Entropia para computação

Talvez você já tenha ouvido falar da entropia na física, de forma bem didática, a entropia é uma grandeza fundamental que mede o grau de desordem ou aleatoriedade de um sistema. Em outras palavras, ela quantifica a dispersão da energia e a indisponibilidade dela para realizar trabalho útil. Imagine um quarto bagunçado: quanto mais desorganizada e espalhada estiverem as coisas, maior será a entropia do ambiente.

Já na computação, o significado de entropia difere um pouco, ela se refere à aleatoriedade ou imprevisibilidade de dados ou eventos. Em outras palavras, a entropia computacional mede a quantidade de informação que falta para se ter uma compreensão completa de um sistema.

Na obra seminal "A Mathematical Theory of Communication" (1948), Claude Shannon define a entropia como uma medida da incerteza ou imprevisibilidade em uma mensagem. Em outras palavras, a entropia quantifica a quantidade de informação desconhecida em uma mensagem.

Shannon propôs que a entropia de uma mensagem pode ser calculada usando a seguinte fórmula:

```python
H(X) = -Σ p(x) log₂ p(x)
```

Onde:

H(X) é a entropia da mensagem
p(x) é a probabilidade de ocorrência do símbolo x na mensagem.

Essa fórmula nos diz que a entropia de uma mensagem é maior quando a probabilidade de cada símbolo é menor. Ou seja, quanto mais incertos formos sobre qual símbolo irá aparecer em seguida, maior será a entropia da mensagem.

Então para o nosso caso, podemos reescrever da seguinte forma:

```python
H = l *  log₂(b)
```

em que, `l` é o número de caracteres utilizado, ou seja, quando pensamos em senhas, será o tamanho da senha. Já o `b` são os números de caractes possíveis, ou seja, se puder somente letras maiúsculas do alfabeto latino o valor de `b` será 26. Agora se considerar as minúsculas, também são 26, o total será 52. Além disso, também existem os caracteres especiais que são 32 e mais 10 alfanumérico, totalizando 94.

Então para medir a entropia e a qualidade da senha iremos usar essa equação acima. Além disso, essa aplicação também faz verificação se a senha já vazou.

### Observações

Embora senhas com alto grau de aleatoriedade sejam resistentes a ataques de força bruta básicos, que testam combinações de caracteres sem lógica, essa proteção se torna insuficiente na era atual. Programas de cracking de senhas como o John the Ripper exploram ataques de dicionário, utilizando padrões comuns de criação de senhas entre os usuários para aumentar a eficiência do processo.

**Por que as senhas simples são vulneráveis?**

* **Facilidade de adivinhação:** Senhas curtas, compostas apenas por letras minúsculas ou números, são mais fáceis de serem adivinhadas por humanos ou programas, reduzindo o tempo necessário para o ataque.
* **Padrões previsíveis:** O uso de datas de nascimento, nomes de animais de estimação ou outras informações pessoais como base para a senha aumenta a probabilidade de que ela seja encontrada em dicionários ou listas pré-compiladas de senhas comuns.
* **Reutilização:** Reutilizar a mesma senha em diferentes plataformas aumenta drasticamente o risco de comprometer todas as suas contas caso uma delas seja violada.

**Como se proteger contra ataques de dicionário?**

* **Adote senhas longas e complexas:** Utilize senhas com no mínimo 12 caracteres, combinando letras maiúsculas e minúsculas, números, símbolos e caracteres especiais.
* **Evite padrões óbvios:** Não utilize informações pessoais como base para sua senha. Crie senhas aleatórias e memoráveis, ou utilize um gerenciador de senhas para gerar e armazená-las com segurança.
* **Ative a autenticação multifator:** Além da senha, utilize outros métodos de autenticação, como códigos enviados por SMS ou email, para aumentar a segurança da sua conta.
* **Mantenha o software atualizado:** Mantenha seu sistema operacional e aplicativos atualizados com as últimas correções de segurança, que podem proteger contra vulnerabilidades conhecidas exploradas por ataques de dicionário.

### Referências

1. Shannon(1948) Claude E. Shannon. A Mathematical Theory of Communication. (https://monoskop.org/images/a/ae/Shannon_Claude_E_A_Mathematical_Theory_of_Communication_1957.pdf, pg 15).

## Instalando o software

Primeiro faça o clone do repositório, após isso entre no diretório raiz. Será necessário instalar o **django** e **requests**, para isso:

```shell
pip install django
pip install requests
```

Após isso, será necessário rodar o seguinte comando:

```shell
python manage.py runserver
```
