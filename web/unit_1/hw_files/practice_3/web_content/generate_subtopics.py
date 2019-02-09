#!/usr/bin/env python3

title = 'Tema'

def set_content(title, topic, subtopic):
    return f"""<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8">
    <meta name="description" content="Ejemplo de HTML5">
    <meta name="keywords" content="HTML5, CSS3, JavaScript">
    <link rel="stylesheet" href="misestilos.css">
    <title>{title} {topic}.{subtopic}</title>
  </head>
  <body>
    <section>
      <article>
        <p>
          Consectetur id laudantium commodi architecto facilis. Veniam dolorum
          eveniet amet et nobis Maiores quidem ea expedita maxime mollitia? Porro
          quos a enim quibusdam hic. Quas non beatae incidunt dolore eum?
        </p>
      </article>
      <article>
        <p>
          Consectetur id laudantium commodi architecto facilis. Veniam dolorum
          eveniet amet et nobis Maiores quidem ea expedita maxime mollitia? Porro
          quos a enim quibusdam hic. Quas non beatae incidunt dolore eum?
        </p>
      </article>
      <a href="index.html">Regresar</a>
    </section>
  </body>
</html>
"""

for i in range(1, 6):
    for j in range(1, 8):

        file_name = title+'_'+str(i)+'_'+str(j)+'.html'

        with open(file_name, 'w') as new_file:
            topic = str(i)
            subtopic = str(j)
            new_file.write(set_content(title, topic, subtopic))
            print(f'{file_name} done')

        if i == 1 and  j == 4:
            break
        elif i == 2 and  j == 7:
            break
        elif i == 3 and  j == 4:
            break
        elif i == 4 and  j == 6:
            break
        elif i == 5 and  j == 6:
            break
