export const writeFileCb = (file, err) => {
  if (err) console.log(err);
  else {
    console.log(`${file} updated`);
  }
};
