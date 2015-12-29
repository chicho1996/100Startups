while inotifywait -r style.less; do
    lessc -x style.less ../css/style.css;
done