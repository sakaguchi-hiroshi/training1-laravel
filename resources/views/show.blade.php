<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <table>
    <thead>
      <tr>
        <th>名前</th>
        <th>メッセージ</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>{{$item->name}}</td>
        @foreach ($user as $user)
        <td>{{$user->text}}</td>
        @endforeach
      </tr>
    </tbody>
  </table>
</body>
</html>
